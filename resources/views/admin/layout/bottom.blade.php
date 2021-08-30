<script src="{{asset('public/admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/popper.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{asset('public/admin/assets/js/plugins.js')}}"></script>
<script src="{{asset('public/admin/assets/js/main.js')}}"></script>
<!-- Multiple select dropdown -->
<script src="{{asset('public/admin/assets/js/lib/chosen/chosen.jquery.min.js')}}"></script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>



<!-- CK Editor -->
<script src="{{asset('public/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script>
    jQuery(document).ready(function() {

        jQuery('textarea.my-editor').ckeditor({
            filebrowserImageBrowseUrl: '{{ url("/public") }}/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '{{ url("/public") }}/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '{{ url("/public") }}/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '{{ url("/public") }}/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
    });

</script>



<script src="{{asset('public/admin/assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
<script src="{{asset('public/admin/assets/js/dashboard.js')}}"></script>
<script src="{{asset('public/admin/assets/js/widgets.js')}}"></script>
<script src="{{asset('public/admin/assets/js/lib/vector-map/jquery.vmap.js')}}"></script>
<script src="{{asset('public/admin/assets/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('public/admin/assets/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>
<script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>

<script>
    setTimeout(function() {
        $('#mydiv').fadeOut('slod');
    }, 2000);
</script>


<script type="text/javascript">
    $('body').on('keyup','#postSearch',function (){
        var searchQueries = $(this).val();
        $.ajax({
            method: 'POST',
            url: '{{route("back.search")}}',
            dataType: 'json',
            data: {
                '_token' : '{{csrf_token()}}',
                searchQueries: searchQueries,

            },
            success:function (res){
                var Result = ' ';
                $('#SearchResult').html('');
                $.each(res,function (index,value){
                    //Result = '<tr><td id="td1"><a href="'+value.catslug+'">'+value.title+'</a></td><td id="td2"><img height="80" width="80" src="{{asset('public/postimage')}}/'+value.list_image+'" ></td></tr>';
                    Result = '<tr><td id="td1"><a href="{{url('/details')}}/'+value.catslug+'/'+value.id+'/'+value.slug+'">'+value.title+'</a></td><td id="td2"><img height="80" width="80" src="{{asset('public/postimage')}}/'+value.list_image+'" ></td></tr>';

                    $('#SearchResult').append(Result);
                })
            }
        });
    })
</script>
