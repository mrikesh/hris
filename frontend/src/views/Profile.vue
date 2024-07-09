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
        <ProfileInfoDetails profile-content-title="Address Information" :profileDetails="addressInfo" />
        <ProfileInfoDetails profile-content-title="Official Information" :profileDetails="officialInfo" />
        <ProfileInfoDetails profile-content-title="Assigned Projects" :profileDetails="assignedProjectInfo" />
        <ProfileInfoDetails profile-content-title="Contact Person Details" :profileDetails="contactPersonInfo" />
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
                    title: "Supervisor",
                    info: "John Doe"
                },
                {
                    title: "Gender",
                    info: "Male"
                },
                {
                    title: "DOB",
                    info: "john.doe@example.com"
                },
                {
                    title: "Religion",
                    info: "(123) 456-7890"
                },
                {
                    title: "Workstation",
                    info: "John Doe"
                },
                {
                    title: "Type",
                    info: "Male"
                },
                {
                    title: "Subject",
                    info: "john.doe@example.com"
                },
                {
                    title: "Academic Qualification",
                    info: "(123) 456-7890"
                }
            ],
            addressInfo: [{
                    title: "Current Address",
                    info: "123 Main St, Anytown, USA"
                },
                {
                    title: "Permanent Address",
                    info: "Anytown"
                },
            ],
            officialInfo: [{
                    title: "Vertical",
                    info: "E12345"
                },
                {
                    title: "Department",
                    info: "Engineering"
                },
                {
                    title: "Pan Number",
                    info: "Software Engineer"
                },
                {
                    title: "Account Number",
                    info: "Jane Smith"
                },
                {
                    title: "Bank Name",
                    info: "E12345"
                },
                {
                    title: "Branch Name",
                    info: "Engineering"
                },
                {
                    title: "Faculty",
                    info: "Software Engineer"
                },
                {
                    title: "Subject",
                    info: "Jane Smith"
                },
            ],
            assignedProjectInfo: [

            ],
            contactPersonInfo: [{
                    title: "Name",
                    info: "123 Main St, Anytown, USA"
                },
                {
                    title: "Mobile Number",
                    info: "Anytown"
                },
                {
                    title: "Relation",
                    info: "Anytown"
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
