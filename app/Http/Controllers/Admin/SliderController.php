<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function create()
    {
        return view('admin.slider.add', [
            'title' => 'Thêm Slider Mới'
        ]);
    }

    public function store(Request $request)
    {
        // Validate form input người dùng nhập -> Có thể tạo 1 FormRequest cho Slider để validate
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required'
        ]);

        $this->sliderService->insert($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.slider.list', [
            'title' => 'Danh Sách Slider Mới Nhất',
            'sliders' => $this->sliderService->get()
        ]);
    }


    public function show(Slider $slider)
    {
        return view('admin.slider.edit', [
            'title' => 'Chỉnh Sửa Slider',
            'slider' => $slider
        ]);
    }

    public function update(Request $request, Slider $slider)
    {
        // Validate form input người dùng nhập -> Có thể tạo 1 FormRequest cho Slider để validate
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required'
        ]);

        $result = $this->sliderService->update($request, $slider);

        return $result == true ? redirect('/admin/sliders/list') : redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->sliderService->delete($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Slider'
            ]);
        }

        if ($result) {
            return response()->json(['error' => true]);
        }
    }
}
