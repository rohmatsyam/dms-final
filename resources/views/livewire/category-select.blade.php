<div>
    <div class="my-3">
        <label>Pilih Kategori</label>
        <form action="" method="">
            @csrf
            {{-- SATU --}}
            <select class="form-select" wire:model="selectedCategory">
                @foreach ($category as $satu => $item)
                    <option value="{{ $satu }}">{{ $item->name }}, id = {{ $item->category_id }}</option>
                @endforeach
            </select>
            {{-- DUA --}}
            @if ($selectedCategory or $selectedCategory == '0')
                @if ($selectedCategory == '0')
                    <?php $selectedCategory = 0; ?>
                @endif
                @if (isset($category[$selectedCategory]->children))
                    <div class="form-grub">
                        <div class="col-sm-10">
                            <label>Select Sub categories</label>
                            <select class="form-select" wire:model="selectedSubCategory">
                                @foreach ($category[$selectedCategory]->children as $dua => $itemm)
                                    @if (isset($itemm->name))
                                        <option value="{{ $dua }}">{{ $itemm->name }}, id =
                                            {{ $itemm->category_id }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
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
                    <div class="form-grub">
                        <div class="col-sm-10">
                            <label>Select Spesific categories</label>
                            <select class="form-select" wire:model="selectedSubSubCategory">
                                @foreach ($category[$selectedCategory]->children[$selectedSubCategory]->children as $tiga => $itemmm)
                                    @if (isset($itemmm->name))
                                        <option value="{{ $tiga }}">{{ $itemmm->name }}, id
                                            ={{ $itemmm->category_id }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
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
            <x-input id="categoryattr" type="number" name="categoryattr" value= />
            <x-button>
                {{ __('Get Category Attributes') }}
            </x-button>
        </form>
    </div>
</div>
