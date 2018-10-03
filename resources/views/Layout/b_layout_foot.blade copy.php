{!! H::script('mdbboot/js/jquery.js') !!}
{!! H::script('mdbboot/js/jquery-3.3.1.js') !!}
{!! H::script('mdbboot/js/bootstrap.js') !!}
{!! H::script('mdbboot/js/mdb.js') !!}
{!! H::script('Materail/js/materialize.js') !!}
{!! H::script('mdbboot/js/Popper.js') !!}
{!! H::script('mdbboot/js/js_head.js') !!}
{!! H::script('cke/ckeditor.js') !!}


{!! H::script('bootstrapinput/js/fileinput.js') !!}
{!! H::script('bootstrapinput/js/locales/LANG.js') !!}
{!! H::script('bootstrapinput/js/locales/th.js') !!}
{!! H::script('bootstrapinput/js/plugins/piexif.js') !!}
{!! H::script('bootstrapinput/js/plugins/purify.js') !!}
{!! H::script('bootstrapinput/js/plugins/sortable.js') !!}


{!! H::script('ladda/js/spin.js') !!}
{!! H::script('ladda/js/ladda.js') !!}



<script>
    // SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    //Ps.initialize(sideNavScrollbar);
</script>
@yield("script");