<template>
    <button class="qr-btn" @click="showQR">
        <i class="material-icons">qr_code_scanner</i>
    </button>
    <div class="qr-overlay" v-if="isQRVisible">
        <div class="qr-container">
            <div class="qr-header">
                {{ qrTitle }}
            </div>
            <div class="qr-img">
                <img :src="imagePath" alt="QR Code">
                <div class="qr-info">
                    {{ qrInfo }}
                </div>
            </div>
            <div class="qr-footer">
                <button class="qr-close-btn" @click="hideQR">Close</button>
            </div>
        </div>
    </div>
</template>

<script>
import QrCodeImage from '@/assets/QrCode.png';
export default {
    name: "QrScanBtn",
    data() {
        return {
            isQRVisible: false,
            qrTitle: "Attendance QR Code",
            imagePath: QrCodeImage,
            qrInfo: "Scan The QR Code To Mark Attendance"
        }
    },
    methods: {
        showQR() {
            this.isQRVisible = true;
        },
        hideQR(){
            this.isQRVisible = false;
        }
    }
}
</script>

<style scoped>
.qr-btn {
    border: none;
    background: none;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    cursor: pointer;
}

.qr-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.qr-container {
    width: 500px;
    height: auto;
    border: .25px solid #c7c1c180;
    border-radius: 4px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    z-index: 1001;
}

.qr-header {
    padding: 16px;
    font-size: 20px;
    font-weight: 500;
    border-bottom: 1px solid #c7c1c180;
}

.qr-img {
    padding: 16px;
}

.qr-img img {
    width: 100%;
}

.qr-info {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    font-weight: 500;
}

.qr-footer {
    padding: 16px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.qr-close-btn {
    padding: 6px 12px;
    border: none;
    background-color: #DC3545;
    color: #ffffff;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
}

.qr-close-btn:hover {
    background-color: #bb2d3b;
}
</style>
