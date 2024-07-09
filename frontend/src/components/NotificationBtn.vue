<template>
    <div>
        <button @click="toggleNotification" class="notification-button">
            <i class="eva eva-bell-outline custom-icon"></i>
        </button>
        <div class="notification-overlay" :class="{ 'overlay-active': isActive }" v-on:click="toggleNotification">
            <div class="notification" :class="{ 'notification-active': isActive }" v-on:click.stop>
                <div class="notification-content">
                    <div class="notification-title">
                        <h6>Notifications</h6>
                        <div class="notification-tabs">
                            <div class="tab1">New</div>
                            <div class="tab2">All</div>
                        </div>
                    </div>
                    <div class="notification-items">
                        <p>This is a sample notification message.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    name: "NotificationBtn",
    setup() {
        const isActive = ref(false);

        const toggleNotification = () => {
            isActive.value = !isActive.value;
        };

        return {
            isActive,
            toggleNotification,
        };
    },
};
</script>

<style scoped>
.notification {
    position: fixed;
    top: 0;
    right: 0;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: width 0.3s ease-in-out;
    width: 0;
    min-height: 100vh;
    overflow: hidden;
    border-radius: 0;
    z-index: 10000;
}

.notification-active {
    width: 450px;
    transition: width 0.3s ease-in-out;
}

.notification-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 10001;
    transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
    opacity: 0;
    visibility: hidden;
}

.overlay-active {
    opacity: 1;
    visibility: visible;
}

.notification-content {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.notification-button {
    font-size: 24px;
    border: none;
    cursor: pointer;
    background: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
}

.notification button {
    margin-top: 10px;
    padding: 5px 10px;
    background-color: #f44336;
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.notification button:hover {
    background-color: #d32f2f;
}

.notification-title {
    width: 100%;
    padding: 0 16px;
    min-height: 50px;
    background-color: #E0E0E0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.notification h6{
    width: 145px;
    margin: 16px 0px;
    font-size: 21px;
    font-weight: 400;
}

.notification-tabs{
    display: flex;
}

.tab1, .tab2{
    padding: 0 16px;
    font-size: 14px;
    color: #2374E1;
    font-weight: 500;
    line-height: 1.715em;
}

.notification-items{
    padding: 16px;
}
</style>
