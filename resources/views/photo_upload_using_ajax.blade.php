@extends('welcome')
@section('view')
<div class="container">
    <div class="flex justify-center items-center" style="height: 70vh;">
        <div class="relative flex bg-clip-border rounded-xl bg-white text-gray-700 shadow-md w-full max-w-[48rem] flex-row">
            <div
              class="relative w-2/5 m-0 overflow-hidden text-gray-700 bg-white rounded-r-none bg-clip-border rounded-xl shrink-0">
              <img id="image"
                src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                alt="card-image" class="object-cover w-full h-full" />
            </div>
            <div class="p-6">
              <h6
                class="block mb-4 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-gray-700 uppercase">
                Photo Uplaod System <span class="float-right text-sm" id="message"></span>
              </h6>
              <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                Upload A Photo To See it getting updated in Real Time
              </h4>
              <p class="block mb-8 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati blanditiis quia nobis officia cumque beatae expedita totam illo ullam, ducimus saepe consequuntur! Assumenda fuga laboriosam adipisci nisi aliquid tenetur, officia natus consequatur ipsum illo
              </p>
              <div class="relative flex w-full max-w-[24rem]">
                <div class="relative h-10 w-full min-w-[200px]">
                    @csrf
                  <input type="text" id="filename" readonly
                    class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 pr-20 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                    placeholder=" " value="" />
                  <label
                    class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    Upload Photo
                  </label>
                  <input type="file" name="file" hidden id="file" accept="image/*" onchange="inputFileName(this.files[0])">
                </div>
                <button onclick="uploadFile()"
                  class="!absolute right-1 bg-black top-1 select-none rounded bg-blue-gray-500 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-gray-500/20 transition-all hover:shadow-lg hover:shadow-blue-gray-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                  type="button">
                  Upload
                </button>
              </div> 
            </div>
          </div>  
    </div>
</div>
<script>
    $('#filename').on('click',function() {
        $("#file").trigger("click");
    });

    function inputFileName(file) {
        if (file && file.type.startsWith('image/')) {
            const fileToUpload = file;
            console.log(fileToUpload);
            $('#filename').val(file.name);
        } else {
            $('#file').val('');
            $('#filename').val('');
            alert('Please select a valid image file.');
        }
    }

    function uploadFile() {
        var file = $('#file').prop('files')[0];
        console.log(file);
        var token = $('input[name="_token"]').val();
        let formData = new FormData();
        formData.append('file', file);
        formData.append('_token', token);

        $.ajax({
          url: '{{route('photo_upload_using_ajax')}}',
          cache:false,
          contentType: false,
          processData: false,
          method:'POST',
          enctype: 'multipart/form-data',
          data: formData,
          success: function(result) {
            
            let data = result.data;
            $('#image').attr('src', data.file_url); 
            $('#message').html(result.message);
            $('#message').addClass('text-green-500');
            $('#file').val('');
            $('#filename').val('');
          },
          error: function(err) {
            alert(err.message);
            $('#file').val('');
            $('#filename').val('');
            $('#message').html(err.message);
            $('#message').addClass('text-red-500');
          }
        });
    }
</script>
@endsection