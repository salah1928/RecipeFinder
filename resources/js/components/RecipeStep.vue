<template>
    <div>
         <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Step</strong>
            <input v-model="value.name" type="text" name="stepN" class="form-control" placeholder="Enter step name">
        </div>
    </div>
    
    <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Step desc</strong>
            <input v-model="value.desc" type="text" name="stepD" class="form-control" placeholder="Enter step description">
        </div>
    </div>

    <div class="col-md-7 m-auto">
        <strong>Step Img</strong>
        <input class="col-md-7 m-auto" name="image" type="file">
    </div>

    </div>
</template>
<script>
export default {
    props: {
            value: {
                type: Object,
                required: true
            }
        },
        watch: {
            value() {
                this.$emit('input', this.value);
            }
        }
}
</script>