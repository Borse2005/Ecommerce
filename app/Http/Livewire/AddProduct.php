<?php
namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;

class AddProduct extends Component
{
    public $category;
    public $subcategories;

    public $selectedCountry = null;
    public $selectedSubcategory = null;
    public $selectedCity = null;

    public function mount($selectedCity = null)
    {
        $this->category = Category::all();
        $this->subcategories = collect();
        $this->selectedCity = $selectedCity;

        if (!is_null($selectedCity)) {
            $city = Product::with('category','subcategory')->find($selectedCity);
            if ($city) {
                $this->subcategories = Subcategory::where('category_id', $city->subcategory->category_id)->get();
                $this->selectedCountry =  $city->subcategory->category_id;
                $this->selectedSubcategory = $city->subcategory_id;
            }
        }
    }

    public function render()
    {
        return view('livewire.add-product');
    }

    public function updatedSelectedCountry($country)
    {
        $this->subcategories = Subcategory::where('category_id', $country)->get();
        $this->selectedSubcategory = NULL;
    }
}