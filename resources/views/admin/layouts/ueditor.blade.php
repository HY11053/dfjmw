@include('vendor.ueditor.assets')
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container',{
        toolbars: [
            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'unlink', 'insertimage','source', //源代码
                'emotion', 'fullscreen','insertvideo','music']
        ],
        elementPathEnabled: false,
        enableContextMenu: true,
        autoClearEmptyNode:true,
        initialFrameHeight:300,
        wordCount:false,
        imagePopup:true,
        autotypeset:{ indent: true,imageBlockLine: 'center' }
    });
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>