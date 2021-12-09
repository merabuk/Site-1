<template>
    <div class="form-group">
        <div class="form-check">
            <input name="is_guest" class="form-check-input" type="checkbox" id="is_guest" v-model="showInputs">
            <label id="is_guest-label" class="form-check-label" for="is_guest">
                Я згоден на реєстрацію на сайті
            </label>
        </div>
        <div v-if="showInputs" class="form-group row">
            <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Пароль<span class="color-red">*</span></label>
            <div class="col-sm-7 col-md-8 col-lg-6">
                <span class="icon-error" id="password-icon" style="display: none;"></span>
                <input type="password" class="form-control" id="password"
                    placeholder="********" name="password" minlength="8" maxlength="255">
            </div>
            <span class="text-error col- col-lg-3" id="password-text" style="display: none;"></span>
        </div>
        <div v-if="showInputs" class="form-group row">
            <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Повторити пароль<span class="color-red">*</span></label>
            <div class="col-sm-7 col-md-8 col-lg-6">
                <span class="icon-error" id="password_confirmation-icon" style="display: none;"></span>
                <input type="password" class="form-control" id="password_confirmation"
                    placeholder="********" name="password_confirmation" minlength="8" maxlength="255">
            </div>
            <span class="text-error col- col-lg-3" id="password_confirmation-text" style="display: none;"></span>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                showInputs: false,
            }
        },
    }
</script>
