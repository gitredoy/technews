<!-- jquery Core-->
<script src="{{asset('public/front/assets/js/jquery-2.1.4.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('public/front/assets/js/bootstrap.min.js')}}"></script>

<!-- Theme Menu -->
<script src="{{asset('public/front/assets/js/mobile-menu.js')}}"></script>

<!-- Owl carousel -->
<script src="{{asset('public/front/assets/js/owl.carousel.min.js')}}"></script>

<!-- Theme Script -->
<script src="{{asset('public/front/assets/js/script.js')}}"></script>

<!-- Preloader Script -->

<script>
    $(document).ready(function(){
        setTimeout(function() {
            $("#mypreloader").fadeOut();
        },2200);
    });
</script>

<script type="text/javascript">
    $('body').on('keyup','#fontquery',function (){
        var searchQueries = $(this).val();
        console.log(searchQueries);
        $.ajax({
            method: 'POST',
            url: '',
            dataType: 'json',
            data: {
                '_token' : '{{csrf_token()}}',
                searchQueries: searchQueries,

            },
            success:function (res){
                var Result = ' ';
                $('#fontSearch').html('');
                $.each(res,function (index,value){
                    //Result = '<tr><td id="td1"><a href="'+value.catslug+'">'+value.title+'</a></td><td id="td2"><img height="80" width="80" src="{{asset('public/postimage')}}/'+value.list_image+'" ></td></tr>';
                    Result = '<tr><td id="td1"><a href="{{url('/details')}}/'+value.catslug+'/'+value.id+'/'+value.slug+'">'+value.title+'</a></td><td id="td2"><img height="80" width="80" src="{{asset('public/postimage')}}/'+value.list_image+'" ></td></tr>';

                    $('#fontSearch').append(Result);
                })
            }
        });
    })
</script>

