<template>
<div class="card">
    <div class="main-profile-content">
        <div class="profile">
            <ProfileName />
        </div>
        <div class="sub-profile">
            <div class="sub-profile-1">
                <ProfileSubInfo icon="call" subInfo="Phone Number"/>
                <ProfileSubInfo icon="email" subInfo="test@email.com" />
            </div>
            <div class="sub-profile-2">
                <ProfileSubInfo icon="calendar_month" subInfo="Calendar" />
                <ProfileSubInfo icon="calendar_month" subInfo="Calendar" />
            </div>
        </div>
    </div>
    <hr>
    <div class="profile-content">
        <ProfileInfoDetails profile-content-title="Personal Information" :profileDetails="personalInfo" />
        <ProfileInfoDetails profile-content-title="Official Information" :profileDetails="officialInfo" />
    </div>
</div>
</template>

<script>
import ProfileSubInfo from '@/components/ProfileComponents/ProfileSubInfo.vue'
import ProfileInfoDetails from '@/components/ProfileComponents/ProfileInfoDetails.vue';
import ProfileName from '@/components/ProfileComponents/ProfileName.vue'

export default {
    name: "Profile",
    components: {
        ProfileInfoDetails,
        ProfileName,
        ProfileSubInfo,
    },
    data() {
        return {
            personalInfo: [{
                    title: "Full Name",
                    info: "John Doe"
                },
                {
                    title: "Gender",
                    info: "Male"
                },
                {
                    title: "Address",
                    info: "DurbarMarg"
                },
                {
                    title: "Phone No.",
                    info: "(123) 456-7890"
                },
                {
                    title: "DOB",
                    info: "2000-01-24"
                },
            ],
            officialInfo: [{
                    title: "Employee ID",
                    info: "E12345"
                },
                {
                    title: "Department",
                    info: "Engineering"
                },
                {
                    title: "Position",
                    info: "Software Engineer"
                },
            ],
        }
    }
}
</script>

<style scoped>
.main-profile-content {
    width: 100%;
    padding: 16px;
    display: flex;
}

.profile {
    width: 40%;
    padding: 16px;
}

.profile-content {
    padding: 0 16px 16px 16px;
}

hr {
    height: 3px;
    margin-top: 0;
}

.sub-profile {
    display: flex;
}
</style>
