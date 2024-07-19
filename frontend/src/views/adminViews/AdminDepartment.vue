<template>
<div class="card">
    <div class="table-top">
        <PageTitle title="Departments" />
    </div>
    <div>
        <div class="add-department">
            <form @submit.prevent="addDepartment">
                <MFormTitle formTitle="Add Department" />
                <hr />
                <span class="labelInput">Department Name</span>
                <MFormInput v-model="newDepartment.name" inputType="text" placeHolder="" formName="deptName" />
                <MFormAddBtn addTitle="Add" />
            </form>
        </div>

        <ul>
            <li v-for="department in departments" :key="department.id">
                {{ department.name }}
                <button @click="editDepartment(department.id)">Edit</button>
                <button @click="deleteDepartment(department.id)">Delete</button>
            </li>
        </ul>
    </div>
</div>
</template>

<script>
import MFormTitle from '@/components/MenuFormComponents/MFormTitle.vue'
import MFormInput from '@/components/MenuFormComponents/MFormInput.vue'
import MFormAddBtn from '@/components/MenuFormComponents/MFormAddBtn.vue'
import PageTitle from '@/components/PageTitle.vue'
import {
    ref,
    onMounted
} from 'vue'
import axios from 'axios'

const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json'
    }
})

export default {
    name: 'AdminDepartment',
    components: {
        PageTitle,
        MFormTitle,
        MFormInput,
        MFormAddBtn,
    },
    setup() {
        const newDepartment = ref({
            name: ''
        })
        const departments = ref([])

        const fetchDepartment = async () => {
            try {
                const response = await api.get('/department')
                departments.value = response.data
            } catch (error) {
                console.error('Error fetching department:', error.response ?.data || error.message)
            }
        }

        const addDepartment = async () => {
            try {
                const response = await api.post('/department-store', {
                    name: newDepartment.value.name
                })
                if (response.data) {
                    departments.value.push(response.data)
                    newDepartment.value.name = '' // Reset the department name after adding
                } else {
                    console.error('Error: No data returned from API')
                }
            } catch (error) {
                console.error('Error adding department:', error.response ?.data || error.message)
            }
        }

        const editDepartment = async (id) => {
            // Implement edit functionality
            console.log('Edit department:', id)
        }

        const deleteDepartment = async (id) => {
            try {
                await api.delete(`/department/${id}`)
                departments.value = departments.value.filter(department => department.id !== id)
            } catch (error) {
                console.error('Error deleting department:', error.response ?.data || error.message)
            }
        }

        onMounted(fetchDepartment)

        return {
            newDepartment,
            departments,
            addDepartment,
            editDepartment,
            deleteDepartment
        }
    }
}
</script>

<style scoped>
.add-department {
    margin: 12px 16px;
    width: 30%;
    border: 1px solid #dfdbda;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
}

hr {
    margin: 10px 0 16px 0;
}

.labelInput {
    margin: 8px 16px;
    color: #5e5c5c;
    font-weight: 500;
}
</style>
