<template>
    <div class="card">
        <div class="table-top">
            <PageTitle title="Departments" />
        </div>
        <div class="department-container">
            <div class="add-department">
                <form @submit.prevent="isEditing ? updateDepartment() : addDepartment()">
                    <MFormTitle formTitle="Add Department" />
                    <hr />
                    <span class="labelInput">Department Name</span>
                    <MFormInput v-model="newDepartment.name" inputType="text" placeHolder="" formName="deptName" />
                    <MFormAddBtn :addTitle="isEditing ? 'Update' : 'Add'" />
                </form>
            </div>
    
            <div class="list-department">
                <TableComponent :formTitle="'List of Departments'" :headers="headers" :rows="departmentRows">
                    <template v-slot:cell-2="{ row, rowIndex }">
                        <button class="edit-btn" @click="editDepartment(rowIndex)">Edit</button>
                        <button class="delete-btn" @click="deleteDepartment(rowIndex)">Delete</button>
                    </template>
                </TableComponent>
            </div>
        </div>
    </div>
</template>

<script>
import TableComponent from '@/components/TableComponent.vue';
import MFormTitle from '@/components/MenuFormComponents/MFormTitle.vue';
import MFormInput from '@/components/MenuFormComponents/MFormInput.vue';
import MFormAddBtn from '@/components/MenuFormComponents/MFormAddBtn.vue';
import PageTitle from '@/components/PageTitle.vue';
import {
    ref,
    onMounted,
    computed,
} from 'vue';
import axios from 'axios';

const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json',
    },
});

export default {
    name: 'AdminDepartment',
    components: {
        PageTitle,
        MFormTitle,
        MFormInput,
        MFormAddBtn,
        TableComponent,
    },
    setup(props, { emit }) {
        const newDepartment = ref({
            name: '',
        });
        const departments = ref([]);
        const isEditing = ref(false);
        const editIndex = ref(null); // Store the index of the department being edited

        const headers = ['S.no', 'Department Name', 'Actions'];

        const fetchDepartments = async () => {
            try {
                const response = await api.get('/department');
                departments.value = response.data;
                emit('update-department-count', departments.value.length); // Emit the initial count
            } catch (error) {
                console.error('Error fetching department:', error.response?.data || error.message);
            }
        };

        const addDepartment = async () => {
            try {
                const response = await api.post('/department-store', {
                    name: newDepartment.value.name,
                });
                if (response.data) {
                    departments.value.push(response.data);
                    emit('update-department-count', departments.value.length); // Emit updated count
                    resetForm();
                }
            } catch (error) {
                console.error('Error adding department:', error.response?.data || error.message);
            }
        };

        const editDepartment = (index) => {
            const department = departments.value[index];
            newDepartment.value.name = department.name; // Set the name to the input field
            isEditing.value = true; // Set editing mode
            editIndex.value = index; // Store the index of the department being edited
        };

        const updateDepartment = async () => {
            const id = departments.value[editIndex.value].id; // Get the ID of the department being edited
            try {
                const response = await api.put(`/department/${id}`, {
                    name: newDepartment.value.name,
                });

                if (response.data) {
                    departments.value[editIndex.value].name = response.data.name;
                    emit('update-department-count', departments.value.length); // Emit updated count
                    resetForm();
                }
            } catch (error) {
                console.error('Error updating department:', error.response?.data || error.message);
            }
        };

        const deleteDepartment = async (index) => {
            const id = departments.value[index].id;
            try {
                await api.delete(`/department/${id}`);
                departments.value = departments.value.filter((department) => department.id !== id);
                emit('update-department-count', departments.value.length); // Emit updated count
            } catch (error) {
                console.error('Error deleting department:', error.response?.data || error.message);
            }
        };

        const resetForm = () => {
            newDepartment.value.name = ''; // Clear the input field
            isEditing.value = false; // Reset editing mode
            editIndex.value = null; // Clear the edit index
        };

        onMounted(fetchDepartments);

        const departmentRows = computed(() => {
            return departments.value.map((department, index) => [
                index + 1, // Serial number
                department.name,
                null, // Placeholder for action buttons
            ]);
        });

        return {
            newDepartment,
            departments,
            headers,
            departmentRows,
            addDepartment,
            editDepartment,
            updateDepartment,
            deleteDepartment,
            resetForm,
            isEditing, // Expose isEditing to the template
        };
    },
};
</script>

<style scoped>
.department-container {
    width: 100%;
}

.add-department {
    margin: 12px 16px;
    width: 30%;
    height: 200px;
    border: 1px solid #dfdbda;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
    overflow-y: auto;
}

hr {
    margin: 10px 0 16px 0;
}

.labelInput {
    margin: 8px 16px;
    color: #5e5c5c;
    font-weight: 500;
}

.department-container {
    display: flex;
}

.list-department {
    margin: 12px 16px;
    width: 70%;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
}

.edit-btn,
.delete-btn {
    margin-right: 10px;
    border-radius: .375rem;
    color: #ffffff;
    font-size: 14px;
    padding: 5px 10px;
}

.edit-btn {
    background-color: #2374E1;
}

.edit-btn:hover {
    background-color: #256fce;
}

.delete-btn {
    background-color: #da1010;
}

.delete-btn:hover {
    background-color: #c70d0d;
}
</style>
