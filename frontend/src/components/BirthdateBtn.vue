<template>
    <button class="btn btn-primary" v-on:click="showRes"><i class="material-icons">cake</i></button>

    <div v-if="isPopupVisible" class="popup-overlay">
        <div class="popup-content">
            <div class="bd-title-section">
                <h6>Employee Birthday</h6>
                <span class="close-btn" @click="closePopup">&times;</span>
            </div>
            <hr class="bd-hr">
            <div class="bd-users-section">
                <div class="bd-users-list">
                    <div class="bd-users">
                        Ram Thapa
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BirthdateBtn",
    data() {
        return {
            isPopupVisible: false,
        }
    },
    methods: {
        showRes() {
            this.isPopupVisible = true;
        },
        closePopup() {
            this.isPopupVisible = false;
        }

    }
}
</script>

<style scoped>
.btn {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    position: fixed;
    bottom: 24px;
    right: 20px;
}

.material-icons {
    font-size: 34px;
    color: white;
}

.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #0006;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.popup-content {
    width: 300px;
    height: auto;
    background: white;
    /*padding: 16px;*/
    border-radius: 4px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    position: relative;
    text-align: center;
}

.bd-title-section h6 {
    padding: 16px;
    text-align: left;
    font-size: 20px;
    margin-bottom: 0;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
}

.bd-hr {
    margin: 0;
}

.bd-users-section {
    padding: 16px;
}

.bd-users-list {
    padding: 8px 16px;
    border: 1px solid #dfdbda;
}

.bd-users {
    text-align: left;
}
</style>