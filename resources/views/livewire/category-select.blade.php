<div>
    <div class="my-3">
        <label>Pilih Kategori</label>
        <form action="" method="">
            @csrf
            <select class="form-select" wire:model="selectedCategory">
                <option selected disable>Klik aku ya :D</option>
                @foreach ($category as $satu => $item)
                    <option value="{{ $satu }}">{{ $item->name }}</option>
                @endforeach
            </select>
            {{-- SATU --}}
            @if ($selectedCategory or $selectedCategory == '0')
                @if ($selectedCategory == '0')
                    <?php $selectedCategory = 0; ?>
                @endif
                @if (isset($category[$selectedCategory]->children))
                    <div class="form-grub">
                        <div class="col-sm-10">
                            <label>Select Sub categories</label>
                            <select class="form-select" wire:model="selectedSubCategory">
                                <option selected disable>Klik aku ya :D</option>
                                @foreach ($category[$selectedCategory]->children as $dua => $itemm)
                                    @if (isset($itemm->name))
                                        <option value="{{ $dua }}">{{ $itemm->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            @endif
            {{-- DUA --}}
            @if ($selectedSubCategory or $selectedSubCategory == '0')
                @if ($selectedSubCategory == '0')
                    <?php $selectedSubCategory = 0; ?>
                @endif
                @if (isset($category[$selectedCategory]->children[$selectedSubCategory]->children))
                    <div class="form-grub">
                        <div class="col-sm-10">
                            <label>Select Spesific categories</label>
                            <select class="form-select" wire:model="selectedSubSubCategory">
                                <option selected disable>Klik aku ya :D</option>
                                @foreach ($category[$selectedCategory]->children[$selectedSubCategory]->children as $tiga => $itemm)
                                    @if (isset($itemm->name))
                                        <option value="{{ $tiga }}">{{ $itemm->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            @endif
        </form>
        <div class="card-footer">
            <div class="col-sm-12" wire:Loading>
                <div class="alert alert-warning" role="alert">
                    Wait !!!
                </div>
            </div>
        </div>
    </div>
</div>
