<template>
    <div class="profile-container">
        <div class="avatar">
            <img src="https://www.hotelbooqi.com/wp-content/uploads/2021/12/128-1280406_view-user-icon-png-user-circle-icon-png.png" alt="avatar">
        </div>
        <div class="name">
            {{ userName }}
            <br>
            <span class="designation">{{ userDesignation }}</span>
        </div>
    </div>
</template>

<script>
export default{
    name: "ProfileName",
    data(){
        return {
            userName: "Rikesh Maharjan",
            userDesignation: "Intern",
        }
    }
}
</script>

<style scoped>
.profile-container{
    display: flex;
    align-items: center;
}

.avatar{
    margin-right: 20px;
}

.avatar img{
    width: 74px;
}

.name{
    color: #343434;
    font-size: 20px;
    font-weight: 500;
    line-height: 26px;
}

.designation{
    color: #727272;
    font-size: 15px;
    font-style: normal;
    font-weight: 400;
    line-height: 20px;
}
</style>