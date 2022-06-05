<?php
$mandatory = [];
$optional = [];
foreach ($attributes as $key => $item) {
    if ($item->is_mandatory == 1) {
        array_push($mandatory, $item);
    } else {
        array_push($optional, $item);
    }
}
$mandatorySplits = array_chunk($mandatory, 2);
?>
<div>
    <div class="col-sm-6 mx-auto">
        <h1>Create Product</h1>
        <form class="">
            @csrf
            <div class="form-text">Required Input</div>
            <div class="form-group border border-danger rounded">
                @foreach ($mandatorySplits as $key => $item)
                    <div class="row my-2">
                        <div class="col-md-6 px-4">
                            @if ($item[0]->name == 'warranty_type' and isset($item[0]->options))
                                <label class="form-label my-0">{{ $item[0]->label }}</label>
                                <select class="form-select">
                                    <option selected>Pilih Garansi disini</option>
                                    @foreach ($item[0]->options as $waranty => $item)
                                        <option value={{ $item->name }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <label for={{ $item[0]->name }} class="form-label my-0">{{ $item[0]->label }}</label>
                                <input type={{ $item[0]->input_type }} class="form-control"
                                    id={{ $item[0]->name }}>
                            @endif
                        </div>
                        @if (array_key_exists(1, $item))
                            <div class="col-md-6 px-4">
                                @if ($item[1]->name == 'warranty_type' and isset($item[1]->options))
                                    <label class="form-label my-0">{{ $item[1]->label }}</label>
                                    <select class="form-select">
                                        <option selected>Pilih Garansi disini</option>
                                        @foreach ($item[1]->options as $waranty => $item)
                                            <option value={{ $item->name }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label for={{ $item[1]->name }}
                                        class="form-label my-0">{{ $item[1]->label }}</label>
                                    <input type={{ $item[1]->input_type }} class="form-control my-0"
                                        id={{ $item[1]->name }}>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- Optional --}}
            <div class="mt-2">
                <div class="form-text">Optional Input</div>
                <div class="form-group border border-warning rounded">
                    <select class="form-select">
                        @foreach ($optional as $kunci => $opt)
                            <option value={{ $kunci }}>{{ $opt->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

    </div>
</div>
