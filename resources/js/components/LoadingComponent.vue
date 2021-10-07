<template>
    <div :class="`spinner-border text-${status}`" role="status">
        <span class="sr-only">{{ loadingText }}</span>
    </div>
</template>

<script>
export default {
    name: "LoadingComponent",
    props: {
        status: {
            type: String,
            default: 'primary'
        },
        loadingText: {
            type: String,
            default: 'Loading...'
        }
    }
}
</script>