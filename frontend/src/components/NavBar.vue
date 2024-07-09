<template>
    <div class="container">
        <div class="nav-main-title-container">
            <span class="nav-main-logo"><img :src="imgSrc" alt="logo"></span>
            <span class="nav-main-title">Human Resource</span>
        </div>
        <div class="nav-list-container">
            <div class="search-bar">
                <SearchBar placeHolder="Type and press enter to search..." widthSize="245px"/>
            </div>
            <div class="nav-items">
                <QrScanBtn />
                <FullScreenBtn />
                <NotificationBtn />
            </div>
        </div>
    </div>
</template>

<script>
import QrScanBtn from '../components/QrScanBtn.vue'
import FullScreenBtn from '../components/FullScreenBtn.vue'
import SearchBar from './SearchBar.vue'
import NotificationBtn from './NotificationBtn.vue'
import imgSrc from '@/assets/hrLogo.svg'
export default {
    name: "NavBar",
    components:{
        SearchBar,
        NotificationBtn,
        FullScreenBtn,
        QrScanBtn,
    },
    data() {
        return {
            imgSrc
        }
    }
}
</script>

<style scoped>
.container {
    background-color: #ffffff;
    border: 1px solid #dfdbda;
    max-width: 100%;
    height: 62px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: fixed;
    top: 0;
    left: 0;
    box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.1), 0 1px 1px -1px rgba(0, 0, 0, 0.06);
    z-index: 9999;

}

.nav-main-title-container{
    width: 210px;
    height: 38px;
    display: flex;
    align-items: center;
}

.nav-main-title{
    color: #353535;
    font-size: 20px;
    font-weight: 500;
    padding: 0 0 0 15px;
}

.nav-main-logo img {
    width: 30px;
    height: 30px;
}

.nav-list-container{
    display: flex;
}

.nav-items{
    padding: 0 0 0 16px;
    display: flex;
    align-items: center;
}
</style>