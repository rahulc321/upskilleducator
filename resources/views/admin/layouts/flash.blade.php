@if(Session::has('success'))
    <script type="text/javascript">
        $.Notification.notify("success", "top right", "Success Notification", "{!! session('success') !!}");
    </script>
@endif
@if(Session::has('error'))
    <script type="text/javascript">
        $.Notification.notify("error", "top right", "Error Notification", "{!! session('error') !!}");
    </script>
@endif
