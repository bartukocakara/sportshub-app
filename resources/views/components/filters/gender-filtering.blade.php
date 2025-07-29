<label class="form-label">{{ __('messages.gender') }}</label>
<select name="gender" class="form-select" data-control="select2" data-placeholder="{{ __('messages.select_gender') }}">
    <option></option>
    <option value="male">👨 {{ __('messages.male') }}</option>
    <option value="female">👩 {{ __('messages.female') }}</option>
    <option value="mixed">👫 {{ __('messages.other') }}</option>
</select>