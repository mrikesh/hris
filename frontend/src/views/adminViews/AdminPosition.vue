<template>
    <div class="card">
        <div class="table-top">
            <PageTitle title="Positions" />
        </div>
        <div class="position-container">
            <div class="add-position">
                <form @submit.prevent="isEditing ? updatePosition() : addPosition()">
                    <MFormTitle formTitle="Add Position" />
                    <hr />
                    <span class="labelInput">Position Name</span>
                    <MFormInput v-model="newPosition.name" inputType="text" placeHolder="" formName="postName" />
                    <MFormAddBtn :addTitle="isEditing ? 'Update' : 'Add'" />
                </form>
            </div>
    
            <div class="list-position">
                <TableComponent :formTitle="'List of Positions'" :headers="headers" :rows="positionRows">
                    <template v-slot:cell-2="{ row, rowIndex }">
                        <button class="edit-btn" @click="editPosition(rowIndex)">Edit</button>
                        <button class="delete-btn" @click="deletePosition(rowIndex)">Delete</button>
                    </template>
                </TableComponent>
            </div>
        </div>
    </div>
</template>
    
<script>
import TableComponent from '@/components/TableComponent.vue'
import MFormTitle from '@/components/MenuFormComponents/MFormTitle.vue'
import MFormInput from '@/components/MenuFormComponents/MFormInput.vue'
import MFormAddBtn from '@/components/MenuFormComponents/MFormAddBtn.vue'
import PageTitle from '@/components/PageTitle.vue'
import {
    ref,
    onMounted,
    computed
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
    name: 'AdminPosition',
    components: {
        PageTitle,
        MFormTitle,
        MFormInput,
        MFormAddBtn,
        TableComponent,
    },
    setup() {
        const newPosition = ref({
            name: ''
        });
        const positions = ref([]);
        const isEditing = ref(false);
        const editIndex = ref(null); // Store the index of the position being edited

        const headers = ['S.no', 'Position Name', 'Actions'];

        const fetchPositions = async () => {
            try {
                const response = await api.get('/position');
                positions.value = response.data;
            } catch (error) {
                console.error('Error fetching position:', error.response?.data || error.message);
            }
        }
    
        const addPosition = async () => {
            try {
                const response = await api.post('/position-store', {
                    name: newPosition.value.name
                });
                if (response.data) {
                    positions.value.push(response.data);
                    resetForm(); // Reset form after adding
                } else {
                    console.error('Error: No data returned from API');
                }
            } catch (error) {
                console.error('Error adding position:', error.response?.data || error.message);
            }
        }
    
        const editPosition = (index) => {
            const position = positions.value[index];
            newPosition.value.name = position.name; // Set the name to the input field
            isEditing.value = true; // Set editing mode
            editIndex.value = index; // Store the index of the position being edited
        }

        const updatePosition = async () => {
            const id = positions.value[editIndex.value].id; // Get the ID of the position being edited
            try {
                const response = await api.put(`/position/${id}`, {
                    name: newPosition.value.name
                });
                if (response.data) {
                    positions.value[editIndex.value].name = response.data.name; // Update the position in the list
                    resetForm(); // Reset the form
                } else {
                    console.error('Error: No data returned from API');
                }
            } catch (error) {
                console.error('Error updating position:', error.response?.data || error.message);
            }
        }

        const deletePosition = async (index) => {
            const id = positions.value[index].id;
            try {
                await api.delete(`/position/${id}`);
                positions.value = positions.value.filter(position => position.id !== id);
            } catch (error) {
                console.error('Error deleting position:', error.response?.data || error.message);
            }
        }
    
        const resetForm = () => {
            newPosition.value.name = ''; // Clear the input field
            isEditing.value = false; // Reset editing mode
            editIndex.value = null; // Clear the edit index
        }

        onMounted(fetchPositions);
    
        const positionRows = computed(() => {
            return positions.value.map((position, index) => [
                index + 1, // Serial number
                position.name,
                null // Placeholder for action buttons
            ]);
        })
    
        return {
            newPosition,
            positions,
            headers,
            positionRows,
            addPosition,
            editPosition,
            updatePosition,
            deletePosition,
            resetForm,
            isEditing // Expose isEditing to the template
        }
    }
}
</script>
    
<style scoped>
.position-container {
    width: 100%;
}

.add-position {
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

.position-container {
    display: flex;
}

.list-position {
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
