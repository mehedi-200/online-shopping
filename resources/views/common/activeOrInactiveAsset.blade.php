<script>
var setIntervalId = setInterval(
   function (){
        var base_url = "{{url('/')}}";
        $.ajax({
            type:"POST",
            url:base_url+'/update-last-seen',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });
    },3000);
function handleLogout() {
    var base_url = "{{url('/')}}";
    $.ajax({
        type:"POST",
        url:base_url+'/logout-last-update',
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
    });
    clearInterval(setIntervalId);
    setTimeout(function () {
        window.location.href = "{{ route('logout') }}";
    }, 100);
}
</script>
