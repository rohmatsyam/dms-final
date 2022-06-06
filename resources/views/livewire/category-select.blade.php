<div>
    <div class="my-3">
        <div class="col-sm-6 mx-auto">
            <form action="" method="">
                @csrf
                {{-- SATU --}}
                <div class="my-2">
                    <label>Pilih Kategori</label>
                    <select class="form-select" wire:model="selectedCategory" onchange="GetCategory(this)">
                        @foreach ($category as $satu => $item)
                            @if ($item->leaf === true)
                                <option value={{ $satu }}>{{ $item->name }} ({{ $item->category_id }}) ☑
                                </option>
                            @else
                                <option value={{ $satu }}>{{ $item->name }} ({{ $item->category_id }})
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                {{-- DUA --}}
                @if ($selectedCategory or $selectedCategory == '0')
                    @if ($selectedCategory == '0')
                        <?php $selectedCategory = 0; ?>
                    @endif
                    @if (isset($category[$selectedCategory]->children))
                        <div class="my-2">
                            <label>Select Sub categories</label>
                            <select class="form-select" wire:model="selectedSubCategory"
                                onchange="GetSubCategory(this)">
                                @foreach ($category[$selectedCategory]->children as $dua => $itemm)
                                    @if ($itemm->leaf === true)
                                        <option value={{ $dua }}>{{ $itemm->name }}
                                            ({{ $itemm->category_id }})
                                            ☑</option>
                                    @else
                                        <option value={{ $dua }}>{{ $itemm->name }}
                                            ({{ $itemm->category_id }})
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @else
                        <?php $selectedSubCategory = null;
                        $selectedSubSubCategory = null; ?>
                    @endif
                @endif
                {{-- TIGA --}}
                @if ($selectedSubCategory or $selectedSubCategory == '0')
                    @if ($selectedSubCategory == '0')
                        <?php $selectedSubCategory = 0; ?>
                    @endif
                    @if (isset($category[$selectedCategory]->children[$selectedSubCategory]->children))
                        <div class="my-2">
                            <label>Select Spesific categories</label>
                            <select class="form-select" wire:model="selectedSubSubCategory"
                                onchange="GetSubSubCategory(this)">
                                @foreach ($category[$selectedCategory]->children[$selectedSubCategory]->children as $tiga => $itemmm)
                                    @if ($itemmm->leaf === true)
                                        <option value={{ $tiga }}>{{ $itemmm->name }}
                                            ({{ $itemmm->category_id }})
                                            ☑</option>
                                    @else
                                        <option value={{ $tiga }}>
                                            {{ $itemmm->name }} ({{ $itemmm->category_id }})</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @else
                        <?php $selectedSubSubCategory = null; ?>
                    @endif
                @endif
                @if ($selectedSubSubCategory == '0')
                    <?php $selectedSubSubCategory = 0; ?>
                @endif
            </form>

            <div>
                <div class="col-sm-12" wire:Loading>
                    <div class="alert alert-warning" role="alert">
                        Wait !!!
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('getcategoryattributes') }}">
                @csrf
                <x-input name="productName" type="hidden" value="{{ $product_name }}" />

                <x-label for="categoryattr" :value="__('Pastikan id disini ya :D')" />
                <x-input id="categoryattr" type="number" name="categoryattr" wire:model="category_id" readonly />
                <div class="row mt-2 justify-content-center items-center">
                    <div class="col-sm-6 text-center">
                        <x-button>
                            {{ __('Get This Attributes') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Script --}}
    <script>
        var category = <?= json_encode($category) ?>;
        var selCategoryId;
        var selSubCategoryId;
        var selSubSubCategoryId;
        var categoryFinal;
        var productName;

        function GetCategory(e) {
            this.selCategoryId = e.options[e.selectedIndex].value;
            this.categoryFinal = this.category[this.selCategoryId].category_id;
            this.productName = this.category[this.selCategoryId].name;
            Livewire.emit('getCategory', this.categoryFinal);
            Livewire.emit('getProductName', this.productName);
        }

        function GetSubCategory(e) {
            this.selSubCategoryId = e.options[e.selectedIndex].value;
            this.categoryFinal = this.category[this.selCategoryId].children[this.selSubCategoryId].category_id;
            this.productName = this.category[this.selCategoryId].children[this.selSubCategoryId].name;
            Livewire.emit('getCategory', this.categoryFinal);
            Livewire.emit('getProductName', this.productName);
        }

        function GetSubSubCategory(e) {
            this.selSubSubCategoryId = e.options[e.selectedIndex].value;
            this.categoryFinal = this.category[this.selCategoryId].children[this.selSubCategoryId].children[this
                .selSubSubCategoryId].category_id;
            this.productName = this.category[this.selCategoryId].children[this.selSubCategoryId].children[this
                .selSubSubCategoryId].name;
            Livewire.emit('getCategory', this.categoryFinal);
            Livewire.emit('getProductName', this.productName);
        }
    </script>
</div>
