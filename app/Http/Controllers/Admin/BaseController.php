<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

/**
 * BaseController, abstract for controller
 *
 * @package App\Http\Controllers\Admin
 */
abstract class BaseController extends Controller
{
    /**
     * Define handle for index paging
     *
     * @return Application|Factory|View
     */
    final public function index(): View
    {
        $data = $this->getDataTable();
        return view($this->getIndexPageName(), $data);
    }

    /**
     * Get list data from table to display
     *
     * @return array
     */
    abstract public function getDataTable(): array;

    /**
     * Define index page name
     *
     * @return string
     */
    abstract public function getIndexPageName(): string;

    /**
     * Get image uploaded name
     *
     * @param  object  $request
     * @param  string  $slugOfImageName
     * @param  string  $path
     *
     * @return string|null
     */
    final public function getImageUploadName(
        object $request,
        string $slugOfImageName,
        string $path
    ): ?string {
        if ($this->isImageUploadExist($request)) {
            $image = $this->moveImageUpload($request, $slugOfImageName, $path);
        } else {
            $image = null;
        }
        return $image;
    }

    /**
     * Defined image upload exist
     *
     * @param  object  $request
     *
     * @return bool
     */
    private function isImageUploadExist(object $request): bool
    {
        return $request->hasFile('image');
    }

    /**
     * Handle move upload image if exist
     *
     * @param  object  $request
     * @param  string  $slugOfImageName
     * @param  string  $path
     *
     * @return string
     */
    private function moveImageUpload(
        object $request,
        string $slugOfImageName,
        string $path
    ): string {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = Str::slug($slugOfImageName).$this->getRandomString().'.'.$extension;
        $file->move($path, $image);
        return $image;
    }

    /**
     * Random string with length equal 5
     *
     * @return string
     */
    private function getRandomString(): string
    {
        return Str::random(5);
    }
}
