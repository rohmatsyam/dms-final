<div>
    <div class="my-3">
        <div class="col-sm-6 mx-auto">
            <label>Pilih Kategori</label>
            <form action="" method="">
                @csrf
                {{-- SATU --}}
                <select class="form-select my-1" wire:model="selectedCategory" onchange="GetCategory(this)">
                    @foreach ($category as $satu => $item)
                        <option value={{ $satu }}>{{ $item->name }}, id = {{ $item->category_id }}</option>
                    @endforeach
                </select>
                {{-- DUA --}}
                @if ($selectedCategory or $selectedCategory == '0')
                    @if ($selectedCategory == '0')
                        <?php $selectedCategory = 0; ?>
                    @endif
                    @if (isset($category[$selectedCategory]->children))
                        <label>Select Sub categories</label>
                        <select class="form-select my-1" wire:model="selectedSubCategory"
                            onchange="GetSubCategory(this)">
                            @foreach ($category[$selectedCategory]->children as $dua => $itemm)
                                @if (isset($itemm->name))
                                    <option value={{ $dua }}>{{ $itemm->name }}, id =
                                        {{ $itemm->category_id }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
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
                        <label>Select Spesific categories</label>
                        <select class="form-select my-1" wire:model="selectedSubSubCategory"
                            onchange="GetSubSubCategory(this)">
                            @foreach ($category[$selectedCategory]->children[$selectedSubCategory]->children as $tiga => $itemmm)
                                @if (isset($itemmm->name))
                                    <option value={{ $tiga }}>
                                        {{ $itemmm->name }}, id
                                        ={{ $itemmm->category_id }}</option>
                                @endif
                            @endforeach
                        </select>
                    @else
                        <?php $selectedSubSubCategory = null; ?>
                    @endif
                @endif
                @if ($selectedSubSubCategory == '0')
                    <?php $selectedSubSubCategory = 0; ?>
                @endif
            </form>
            <div class="card-footer">
                <div class="col-sm-12" wire:Loading>
                    <div class="alert alert-warning" role="alert">
                        Wait !!!
                    </div>
                </div>
            </div>

            <form method="GET" action="{{ route('getcategoryattributes') }}">
                @csrf
                <x-label for="categoryattr" :value="__('Masukkan kategori disini :D')" />
                <x-input id="categoryattr" type="number" name="categoryattr" wire:model="category_id" />
                <x-button>
                    {{ __('Get Category Attributes') }}
                </x-button>
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

        function GetCategory(e) {
            this.selCategoryId = e.options[e.selectedIndex].value;
            this.categoryFinal = this.category[this.selCategoryId].category_id;
            Livewire.emit('getCategory', this.categoryFinal);
        }

        function GetSubCategory(e) {
            this.selSubCategoryId = e.options[e.selectedIndex].value;
            this.categoryFinal = this.category[this.selCategoryId].children[this.selSubCategoryId].category_id;
            Livewire.emit('getCategory', this.categoryFinal);
        }

        function GetSubSubCategory(e) {
            this.selSubSubCategoryId = e.options[e.selectedIndex].value;
            this.categoryFinal = this.category[this.selCategoryId].children[this.selSubCategoryId].children[this
                .selSubSubCategoryId].category_id;
            Livewire.emit('getCategory', this.categoryFinal);
        }
    </script>
</div>
