<template>
    <div class="card-container">
        <router-link :to="route" class="card-link">
            <div class="card">
                <div class="card-items">
                    <div class="card-img">
                        <div class="img-box" :style="{ backgroundColor: imgBoxBgColor }">
                            <span :style="{ color: iconColor }"><i :class="[iconClass, 'custom-icon']"></i></span>
                        </div>
                    </div>
                    <div class="card-info">
                        <span class="db-title">{{ dbTitle }}</span><br>
                        <span class="db-num">{{ dbNum }}</span>
                    </div>
                </div>
            </div>
        </router-link>
    </div>
</template>

<script>
export default {
    name: "DbCard",
    props: {
        route: {
            type: String,
        },
        imgBoxBgColor: {
            type: String,
        },
        iconColor: {
            type: String,
        },
        dbTitle: {
            type: String,
        },
        dbNum: {
            type: Number,
        },
        iconClass: {
            type: String,
        }
    },
}
</script>

<style scoped>
.card-container {
    padding: 16px 16px 0 0;
}

.card-link {
    text-decoration: none;
}

.card {
    padding-right: 10px;
    display: flex;
    flex-direction: column;
    width: auto;
    min-width: 13rem;
    border: 1px solid #dfdbda;
    border-radius: 5px;
    overflow: hidden;
    transition: width 0.3s ease;
    cursor: pointer;
}

.card-items {
    padding: 8px;
    display: flex;
    align-items: center;
}

.card-img {
    width: 66px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.img-box {
    width: 50px;
    height: 50px;
    padding: 10px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
}

.card-info {
    padding-left: 16px;
    flex-grow: 1;
}

.db-title {
    font-size: 13px;
}

.db-num {
    color: #343434;
    font-size: 22px;
    font-weight: 500;
}
</style>
