@if(Session::has('flash_message'))

    <script>
        swal({
            title: '{{ Session::get('flash_message') }}',
            text: ' {{ 'Good job' }}',
            timer: 4000,
            onOpen: () => {
                swal.showLoading()
            }
        }).then((result) => {
            if (result.dismiss === 'timer') {
                console.log('I was closed by the timer')
            }
        })
    </script>

@endif