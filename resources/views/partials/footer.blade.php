</div>
<script src="//cdn.jsdelivr.net/jquery/3.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@if(Auth::check())
<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#custom-editor').summernote({
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true
        });
    });
</script>
<script src="//cdn.jsdelivr.net/d3js/3.5.17/d3.min.js"></script>

@yield('custom_js')
@endif
</body>
</html>