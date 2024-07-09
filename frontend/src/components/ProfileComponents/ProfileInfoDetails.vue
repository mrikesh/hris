<template>
    <div class="profile-content-container">
        <div class="profile-content-title">
            {{ profileContentTitle }}
        </div>
        <div class="profile-content-info">
            <div v-for="(detail,index) in profileDetails":key="index" class="profile-content-details">
                <div class="detail-title">{{detail.title}}</div>
                <div class="detail-info">{{detail.info}}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    name: "ProfileInfoDetails",
    props: {
        profileContentTitle:{
            type: String,
        },
        profileDetails:{
            type: Array,
        }
    }
}
</script>

<style>
.profile-content-container {
    margin-top: 16px;
}

.profile-content-title {
    color: #343434;
    font-size: 18px;
    font-weight: 500;
    line-height: 23px;
}

.profile-content-info {
    margin: 8px 0;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}

.profile-content-details {
    width: 100%;
}

.detail-title {
    font-size: 13px;
    color: #727272;
}

.detail-info {
    font-size: 13px;
    color: #343434;
}
</style>
