<template>
        <div class="py-12">
                    <QRCodeScan />
        </div>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import QRCodeScan from '@/components/scan-qr-code'

    export default {
        components: {
            AppLayout,
            QRCodeScan,
        },
    }
</script>
