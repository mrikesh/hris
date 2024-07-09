<template>
    <button @click="toggleFullScreen" class="fullscreen-button">
        <i class="material-icons">{{ isFullScreen ? 'fullscreen_exit' : 'fullscreen' }}</i>
    </button>
    </template>
    
    <script>
    export default {
        name: "FullScreenBtn",
        data() {
            return {
                isFullScreen: false,
            };
        },
        methods: {
            toggleFullScreen() {
                if (!this.isFullScreen) {
                    this.openFullscreen();
                } else {
                    this.closeFullscreen();
                }
            },
            openFullscreen() {
                const elem = document.documentElement;
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.mozRequestFullScreen) {
                    /* Firefox */
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullscreen) {
                    /* Chrome, Safari & Opera */
                    elem.webkitRequestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    /* IE/Edge */
                    elem.msRequestFullscreen();
                }
                this.isFullScreen = true;
            },
            closeFullscreen() {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    /* Firefox */
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    /* Chrome, Safari & Opera */
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    /* IE/Edge */
                    document.msExitFullscreen();
                }
                this.isFullScreen = false;
            }
        }
    }
    </script>
    
    <style scoped>
    .fullscreen-button {
        border: none;
        background: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        cursor: pointer;
    }
    
    .fullscreen-button i {
        font-size: 24px;
    }
    </style>
    