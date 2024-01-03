@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-secondary command_button" data-command="cache:clear">キャッシュクリア</button>
            <button type="button" class="btn btn-secondary command_button" data-command="migration">マイグレーション</button>
            <pre class="command_result bg-light mt-3 mb-0" style="padding: 1rem; height: 400px; border: 1px solid #dee2e6;"></pre>
        </div>
    </div>
</div>
@endsection

@section('after_script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var endpoint = '<?php echo $endpoint; ?>';
    var commandButtons = document.querySelectorAll('.command_button');
    var resultElement = document.querySelector('.command_result');

    for(var i = 0; i < commandButtons.length; i++) {
        var commandButton = commandButtons[i];
        commandButton.addEventListener('click', function(event) {
            resultElement.innerText = '処理中...\n\n';
            var target = event.target;
            var command = target.getAttribute('data-command');
            console.log(command);
            axios.get(endpoint + '?command=' + command)
                .then((response) => {
                    var data = response.data;
                    resultElement.insertAdjacentText('beforeend', data.log);
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        });
    }
});
</script>
@endsection