@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <div class="container">
        <div class="col-md-12">
            <button class="btn btn-outline-primary task-create">Создать таск</button>
        </div>

        <div class="row">
            <form id="task-create" style="display: none;margin-top: 30px" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputTask_description" class="form-label">Task Description</label>
                    <input type="text" class="form-control" name="task_description" id="exampleInputTask_description">
                </div>

                <div class="mb-3">
                    <label for="time_to_completion" class="form-label">Time to completion</label>
                    <input type="datetime-local" name="time_to_completion" class="form-control" id="time_to_completion">
                </div>

                <label for="multi-select">Days of the week</label>
                <select id="multi-select" name="repeat_type" class="custom-select form-control" multiple>
                    <option value="all">All Days</option>
                    <option value="1">Monday</option>
                    <option value="2">Tuesday</option>
                    <option value="3">Wednesday</option>
                    <option value="4">Thursday</option>
                    <option value="5">Friday</option>
                    <option value="6">Saturday</option>
                    <option value="7">Sunday</option>
                </select>


                <label for="image" class="mt-3">Task Image</label>
                <input onchange="previewFile()" type="file" name="image" id="image" class="form-control">

                <img src="" height="150">

                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
        <div class="row text-center mt-5 content">
            <div class="col-md-6 To-fulfillment">
                <h3>To fulfillment</h3>
            </div>
            <div class="col-md-6 Performed">
                <h3>Performed</h3>
            </div>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('tasks.ajax') }}",
                type: 'GET',
                success: function (response){
                    console.log(response)
                }
            })

            $('.task-create').click(function () {
                $('form').toggle()
            });

            $('#task-create').on('submit', function (event) {
                event.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('tasks.store') }}",
                    type: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response){
                        if(response === 'success'){
                            swal("Good job!", "You clicked the button!", "success");
                        }
                    }
                })
            });
        });

        function previewFile() {
            var preview = document.querySelector('img');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>
@endsection
