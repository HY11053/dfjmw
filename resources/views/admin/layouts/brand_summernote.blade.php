<li>
    <i class="fa fa-user bg-aqua"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
        <h3 class="timeline-header no-border">
            <a href="#" style="display:inline-block;"> {{Form::label('ppjstitle', '品牌介绍标题', array('class' => 'control-label','style'=>'padding-top:5px; '))}}</a>
            {{Form::text('ppjstitle', null, array('class' => 'form-control','id'=>'ppjstitle','placeholder'=>'品牌介绍标题','style'=>'display:inline-block'))}}
        </h3>


    </div>
</li>
<li>
    <i class="fa fa-file-text bg-maroon"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:m:s')}}</span>

        <h3 class="timeline-header"><a href="#">品牌介绍</a> 内容编辑</h3>
        <div class="timeline-body">
            <div class="wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content no-padding">
                                @include('admin.layouts.ueditor')
                                <script id="container" name="body" type="text/plain"  >
                                    @if(isset($articleinfos->body))
                                        {!! $articleinfos->body !!}
                                    @endif
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</li>
<li>
    <i class="fa fa-tags bg-maroon"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:m:s')}}</span>

        <h3 class="timeline-header"><a href="#">加盟详情</a> 内容编辑</h3>
        <div class="form-group col-md-10" style="margin: 5px;">
            {{Form::label('jmxqtitle', '加盟详情标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12','style'=>'padding-top:5px;'))}}
            <div class="col-md-8 col-sm-9 col-xs-12">
                {{Form::text('jmxqtitle', null, array('class' => 'form-control col-md-10','id'=>'jmxqtitle','placeholder'=>'加盟详情标题'))}}
            </div>
        </div>
        <div class="timeline-body">
            <div class="wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content no-padding">
                                <!-- 实例化编辑器 -->
                                <script type="text/javascript">
                                    var ue2 = UE.getEditor('container2',{
                                        toolbars: [
                                            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'unlink', 'insertimage','source', //源代码
                                                'emotion', 'fullscreen','insertvideo','music']
                                        ],
                                        elementPathEnabled: false,
                                       enableContextMenu: true,
                                        autoClearEmptyNode:true,
                                        wordCount:false,
                                        imagePopup:false,
                                        initialFrameHeight:300,
                                        autotypeset:{ indent: true,imageBlockLine: 'center' }
                                    });
                                    ue2.ready(function() {
                                        ue2.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                    });
                                </script>
                                <script id="container2" name="jmxq_content" type="text/plain">
                                    @if(isset($articleinfos->jmxq_content))
                                        {!! $articleinfos->jmxq_content !!}
                                    @endif
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
<li>
    <i class="fa fa-tags bg-maroon"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:m:s')}}</span>

        <h3 class="timeline-header"><a href="#">加盟优势</a> 内容编辑</h3>
        <div class="form-group col-md-10" style="margin: 5px;">
            {{Form::label('jmystitle', '加盟优势标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12','style'=>'padding-top:5px;'))}}
            <div class="col-md-8 col-sm-9 col-xs-12">
                {{Form::text('jmystitle', null, array('class' => 'form-control col-md-10','id'=>'jmystitle','placeholder'=>'品牌介绍标题'))}}
            </div>
        </div>
        <div class="timeline-body">
            <div class="wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content no-padding">

                                <script type="text/javascript">
                                    var ue3 = UE.getEditor('container3',{
                                        toolbars: [
                                            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'unlink', 'insertimage','source', //源代码
                                                'emotion', 'fullscreen','insertvideo','music']
                                        ],
                                        elementPathEnabled: false,
                                       enableContextMenu: true,
                                        autoClearEmptyNode:true,
                                        wordCount:false,
                                        imagePopup:false,
                                        initialFrameHeight:300,
                                        autotypeset:{ indent: true,imageBlockLine: 'center' }
                                    });
                                    ue3.ready(function() {
                                        ue3.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                    });
                                </script>
                                <script id="container3" name="jmys_content" type="text/plain" >
                                    @if(isset($articleinfos->jmys_content))
                                        {!! $articleinfos->jmys_content !!}
                                    @endif
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
<li>
    <i class="fa fa-tags bg-maroon"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:m:s')}}</span>

        <h3 class="timeline-header"><a href="#">加盟流程</a> 内容编辑</h3>
        <div class="form-group col-md-10" style="margin: 5px;">
            {{Form::label('jmlctitle', '加盟流程标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12','style'=>'padding-top:5px;'))}}
            <div class="col-md-8 col-sm-9 col-xs-12">
                {{Form::text('jmlctitle', null, array('class' => 'form-control col-md-10','id'=>'jmlctitle','placeholder'=>'加盟流程标题'))}}
            </div>
        </div>
        <div class="timeline-body">
            <div class="wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content no-padding">

                                <script type="text/javascript">
                                    var ue4 = UE.getEditor('container4',{
                                        toolbars: [
                                            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'unlink', 'insertimage','source', //源代码
                                                'emotion', 'fullscreen','insertvideo','music']
                                        ],
                                        elementPathEnabled: false,
                                       enableContextMenu: true,
                                        autoClearEmptyNode:true,
                                        wordCount:false,
                                        imagePopup:false,
                                        initialFrameHeight:300,
                                        autotypeset:{ indent: true,imageBlockLine: 'center' }
                                    });
                                    ue4.ready(function() {
                                        ue4.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                    });
                                </script>
                                <script id="container4" name="jmlc_content" type="text/plain"  >
                                    @if(isset($articleinfos->jmlc_content))
                                        {!! $articleinfos->jmlc_content !!}
                                    @endif
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
<li>
    <i class="fa fa-tags bg-maroon"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:m:s')}}</span>

        <h3 class="timeline-header"><a href="#">开店要求</a> 内容编辑</h3>
        <div class="form-group col-md-10" style="margin: 5px;">
            {{Form::label('jmzctitle', '开店要求', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12','style'=>'padding-top:5px;'))}}
            <div class="col-md-8 col-sm-9 col-xs-12">
                {{Form::text('jmzctitle', null, array('class' => 'form-control col-md-10','id'=>'jmzctitle','placeholder'=>'开店要求'))}}
            </div>
        </div>
        <div class="timeline-body">
            <div class="wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content no-padding">

                                <script type="text/javascript">
                                    var ue5 = UE.getEditor('container5',{
                                        toolbars: [
                                            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'unlink', 'insertimage','source', //源代码
                                                'emotion', 'fullscreen','insertvideo','music']
                                        ],
                                        elementPathEnabled: false,
                                       enableContextMenu: true,
                                        autoClearEmptyNode:true,
                                        wordCount:false,
                                        imagePopup:false,
                                        initialFrameHeight:300,
                                        autotypeset:{ indent: true,imageBlockLine: 'center' }
                                    });
                                    ue5.ready(function() {
                                        ue5.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                    });
                                </script>
                                <script id="container5" name="jmzc_content" type="text/plain"  >
                                    @if(isset($articleinfos->jmzc_content))
                                        {!! $articleinfos->jmzc_content !!}
                                    @endif
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
<li>
    <i class="fa fa-tags bg-maroon"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:m:s')}}</span>

        <h3 class="timeline-header"><a href="#">开店必看</a> 内容编辑</h3>
        <div class="form-group col-md-10" style="margin: 5px;">
            {{Form::label('jmasktitle', '加盟问答标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12','style'=>'padding-top:5px;'))}}
            <div class="col-md-8 col-sm-9 col-xs-12">
                {{Form::text('jmasktitle', null, array('class' => 'form-control col-md-10','id'=>'jmasktitle','placeholder'=>'加盟问答标题'))}}
            </div>
        </div>
        <div class="timeline-body">
            <div class="wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content no-padding">

                                <script type="text/javascript">
                                    var ue6 = UE.getEditor('container6',{
                                        toolbars: [
                                            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'unlink', 'insertimage','source', //源代码
                                                'emotion', 'fullscreen','insertvideo','music']
                                        ],
                                        elementPathEnabled: false,
                                       enableContextMenu: true,
                                        autoClearEmptyNode:true,
                                        wordCount:false,
                                        imagePopup:false,
                                        initialFrameHeight:300,
                                        autotypeset:{ indent: true,imageBlockLine: 'center' }
                                    });
                                    ue6.ready(function() {
                                        ue6.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                    });
                                </script>
                                <script id="container6" name="jmask_content" type="text/plain"  >
                                    @if(isset($articleinfos->jmask_content))
                                        {!! $articleinfos->jmask_content !!}
                                    @endif
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="timeline-footer">
            <button type="submit"  class="btn btn-md bg-maroon">提交文档</button>
        </div>
    </div>
</li>