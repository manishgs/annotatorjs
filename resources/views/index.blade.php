<html>

<head>
    <link rel="stylesheet" href="http://assets.annotateit.org/annotator/v1.2.7/annotator.min.css">
    <style>
        body {
            padding: 50px;
        }
        ul.pagination { overflow: hidden; padding: 0px; margin-bottom: 50px;}
        ul.pagination li  {float: left; color: #000000;  margin-left: 10px;}
        ul.pagination li a {text-decoration: none; padding: 0px 5px; display: block }
        ul.pagination li.active a {background: #ccc;}
    </style>
</head>

<body>
<ul class="pagination">
    <li>Page</li>
    @for($i=1;$i<11;$i++)
        <li @if($page==$i)class="active"@endif><a href="{{url('/?page='.$i)}}">{{$i}}</a></li>
    @endfor
</ul>                                                                                               

<div id="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sagittis imperdiet placerat. Suspendisse eget
        sem quam. Nullam a volutpat tellus. Quisque ac faucibus turpis. Ut vel purus a nunc gravida finibus sit amet et
        tortor. Praesent vel nibh nec odio imperdiet consectetur. Praesent dignissim, dui ac interdum finibus, odio
        lectus dictum leo, quis rutrum eros nibh non augue. Curabitur finibus id nibh in venenatis. Fusce eget diam
        diam. Nulla sollicitudin tristique nisl, id suscipit augue lobortis ac. Maecenas mollis nunc nec rutrum
        vestibulum. Vivamus condimentum, est nec pellentesque semper, magna nisi commodo neque, quis sagittis dui lacus
        quis enim. Maecenas fringilla mollis bibendum.</p>

    <p>Vestibulum pharetra non elit in aliquam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel
        porta nisl. Proin molestie, metus vel malesuada varius, purus est dignissim risus, eget pharetra orci sem at
        nisi. Donec non bibendum dolor. Quisque ut congue urna, vitae sollicitudin sapien. Vestibulum auctor tellus
        tellus, et malesuada quam fringilla at. Nam tempus nisi a dolor dictum pellentesque</p>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="http://assets.annotateit.org/annotator/v1.2.7/annotator-full.min.js"></script>

<script>
    $(function () {
        var annotation = $('#content').annotator();

        annotation.annotator('addPlugin', 'Store', {
            prefix: '/annotation',
            loadFromSearch: {
                page: {{$page}}
            },
            annotationData: {
                page: {{$page}}
            },
            urls: {
                create: '/store',
                update: '/update/:id',
                destroy: '/delete/:id',
                search: '/search'
            }
        });

    });
</script>

</body>
</html>
