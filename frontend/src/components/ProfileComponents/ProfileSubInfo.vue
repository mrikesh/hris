<template>
    <div class="profile-sub-info">
        <div class="sub-icon">
            <i class="material-icons custom-icon">{{ icon }}</i>
        </div>
        <div class="sub-info">
            {{ subInfo }}
        </div>
    </div>

</template>

<script>
export default{
    name: "ProfileSubInfo",
    props:{
        subInfo:{
            type: String,
        },
        icon:{
            type: String,
        }
    }
}
</script>

<style scoped>
.profile-sub-info{
    display: flex;
    align-items: center;
}

.sub-icon, .sub-info{
    padding: 16px 0 0 16px;
}

.custom-icon{
    font-size: 16px;
    color: #3678d1;
}

.sub-info{
    font-size: 13px;
}
</style>