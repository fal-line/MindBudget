@extends('layouts.b-base')

@section('content-b')
    {{-- <h1>
        Board have been made name : 
        <?php 
            $v1=$_REQUEST['preBoard'];
        ?>
        {{ $v1}}
    </h1> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="row flex justify-content-center">

            @foreach ($boards as $board)
                <h1 class="big-title mb-4">{{$board->boardName}}</h1>
            @endforeach

    <table class="table table-hover" style="table-layout: fixed;">
        <thead  class="header-big">
          <tr>
            <th scope="col" style="width: 10%;"></th>
            <th scope="col" style="width: 5%;">No</th>
            <th scope="col">Item</th>
            <th scope="col">Note</th>
            <th scope="col">Price</th>
            <th scope="col"  style="width: 10%;" class="hide">Action</th>
          </tr>
        </thead>
        
        <tbody>
            
            @foreach ($boards as $board)
        <form method="POST" action="/board/{{$board->id}}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
        
            @endforeach

            @foreach ($items as $item)
            <tr id="row_{{$item->id}}"  class="font-normal">
                <input type="hidden" name="row_{{$item->id}}" value="{{$item->id}}">
            <td>
                <input type="checkbox" class="btn-check" name="status_{{$item->id}}" id="planned_checked_{{$item->id}}" autocomplete="off" value="{{$item->status}}" {{$item->status}}>
                <label class="btn btn-sm" style=" padding: 0 4px" for="planned_checked_{{$item->id}}"><div class="font-normal" id="label_{{$item->id}}"></div></label>
            </td>
            <td class="font-normal fn-center" scope="row"><div class="mx-auto">{{$item->id}}</div></td>
            <td class="font-normal"> <input name="name_{{$item->id}}" class="edit-col input_change_{{$item->id}}" type="text" value="{{$item->itemName}}"></td>
            <td class="font-normal"> <input name="desc_{{$item->id}}" class="edit-col input_change_{{$item->id}}" type="text" value="{{$item->itemDesc}}"></td>
            <td class="font-normal"> <input name="price_{{$item->id}}" class="edit-col input_change_{{$item->id}}" id="dengan-rupiah-{{$item->id}}" type="text" value="Rp. {{ number_format( $item->itemPrice, 0, '','.') }}"></td>
            <td scope="col" class="hide">yes</td>
          </tr>

          <script>
                $(document).ready(function(){
                    if($("#planned_checked_{{$item->id}}").prop('checked')) {
                        $(".input_change_{{$item->id}}").attr('disabled', true),
                        $("input[name=status_{{$item->id}}]").val("checked"),
                        $(".input_change_{{$item->id}}").addClass( "table-dark text-decoration-line-through" ),
                        $("#row_{{$item->id}}").addClass( "table-dark text-decoration-line-through" ),
                        $( "#label_{{$item->id}}" ).html("Undone");
                    } else {
                        $(".input_change_{{$item->id}}").removeClass( "table-dark text-decoration-line-through" ),
                        $(".input_change_{{$item->id}}").attr('disabled', false),
                        // $("input[name=status_{{$item->id}}]").val("unchecked"),
                        $(".input_change_{{$item->id}}").addClass( "table-light" ),
                        $("#row_{{$item->id}}").removeClass( "table-dark text-decoration-line-through" ),
                        $( "#label_{{$item->id}}" ).html("Done");
                    }
                    $("#planned_checked_{{$item->id}}").on("change", function() {
                        if($(this).prop('checked')) {
                            $(".input_change_{{$item->id}}").addClass( "table-dark text-decoration-line-through" ),
                            $(".input_change_{{$item->id}}").attr('disabled', true),
                            $("input[name=status_{{$item->id}}]").val("checked"),
                            $("#row_{{$item->id}}").addClass( "table-dark text-decoration-line-through" ),
                            $( "#label_{{$item->id}}" ).html("Undone");
                        } else {
                            $(".input_change_{{$item->id}}").removeClass( "table-dark text-decoration-line-through" ),
                        // $("input[name=status_{{$item->id}}]").val("unchecked"),
                            $(".input_change_{{$item->id}}").attr('disabled', false),
                            $(".input_change_{{$item->id}}").addClass( "table-light" ),
                            $("#row_{{$item->id}}").removeClass( "table-dark text-decoration-line-through" ),
                            $( "#label_{{$item->id}}" ).html("Done");
                        }
                    });
            });
          </script>

          
            <script>
                $(document).ready(function(){
                /* Dengan Rupiah */
                var dengan_rupiah = document.getElementById('dengan-rupiah-{{$item->id}}');

                dengan_rupiah.addEventListener('keyup', function(e)
                {
                    dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
                });

                /* Fungsi */
                function formatRupiah(angka, prefix)
                {
                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split    = number_string.split(','),
                        sisa     = split[0].length % 3,
                        rupiah     = split[0].substr(0, sisa),
                        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                        
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }
                    
                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                }

            });
            </script>
          
          @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        </tbody>
      </table>

        </div>
    </div>
</div>

{{-- <script>
$("#planned_checked_{{$item->id}}").change(function() {
    if($(this).prop('checked')) {
        alert("Checked Box Selected");
    } else {
        alert("Checked Box deselect");
    }
});
</script> --}}
<script src="../js/cur.js"></script>

@endsection