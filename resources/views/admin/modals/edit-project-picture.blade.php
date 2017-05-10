<div class="row" style="padding: 10rem">
    <div class="row justify-content-center">
        <div class="col-6">
            Kattints a képre, hogy kicseréld<br>
            Kattints a cerúza gombra, hogy átméretezd.
            {!! Form::open(['route' => ['project.picture.update'], 'method' => 'post']) !!}
            <input type="hidden" value="{{$project->id}}" name="projectid">
            <div class="form-group" style="width: 300px;">
                <div id="poster"
                     data-post="input,output,actions"
                     data-crop="{{$project->postercrop}}"
                     data-rotation="{{$project->posterrotation}}">
                    @if($project->posteroriginal)
                        <img src="../videos/posters/{{ $project->posteroriginal }}"/>
                    @else
                        <img src="../{{ $project->poster }}"/>
                    @endif
                    <input type="file" name="profile"/>
                </div>
            </div>
            {!! Form::submit('Frissítés', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
    var crop = $('#poster').data('crop');
    if(crop=="") {
        $('#poster').slim({
            minSize: {
                width: 1,
                height: 1,
            },
            buttonConfirmLabel: 'Ok',
            post: ['input', 'output', 'actions'],
        });
    }else{
        $('#poster').slim({
            minSize: {
                width: 1,
                height: 1,
            },
            crop: {
                x: crop.split(',')[0],
                y: crop.split(',')[1],
                width: crop.split(',')[2],
                height: crop.split(',')[3]
            },
            rotation: $('#poster').data('rotation'),
            buttonConfirmLabel: 'Ok',
            post: ['input', 'output', 'actions'],
        });
    }
</script>
<style>
    .slim-btn-remove{
        display: none!important;
    }
</style>
