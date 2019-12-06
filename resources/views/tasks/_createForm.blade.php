{!! Form::open(['route'=>'tasks.store','method'=>'POST']) !!}
<div class="col-auto">
    <label class="sr-only" for="inlineFormInputGroup">Username</label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-plus"></i></div>
        </div>
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'有什么要完成的具体任务吗？']) !!}
        {!! Form::hidden('project', $project->id) !!}
    </div>
</div>
{!! $errors->create->first('name','<div class="alert alert-danger">:message</div>') !!}
{!! $errors->create->first('project','<div class="alert alert-danger">:message</div>') !!}
{!! Form::close() !!}