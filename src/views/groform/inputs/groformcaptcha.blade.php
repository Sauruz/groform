<input id="groformcaptcha" name="groformcaptcha"  type="hidden">
@php
$original = rand(1, 9999);
$multiplier = rand(1, 9999);
session()->flash('groformcaptcha_sum', $original * $multiplier);
@endphp

<script type="application/javascript">
    const  groformCaptchaListner = function () {
        document.removeEventListener('mousemove', groformCaptchaListner, false);
        document.removeEventListener('mousedown', groformCaptchaListner, false);
        document.removeEventListener('scroll', groformCaptchaListner, false);
        document.removeEventListener('keydown', groformCaptchaListner, false);
        const groformcaptchInput = document.getElementById("groformcaptcha");
        groformcaptchInput.value = {{$original}} * {{$multiplier}};
    };
    document.addEventListener('mousemove', groformCaptchaListner, false);
    document.addEventListener('mousedown', groformCaptchaListner, false);
    document.addEventListener('scroll', groformCaptchaListner, false);
    document.addEventListener('keydown', groformCaptchaListner, false);
</script>
