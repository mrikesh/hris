<template>
<div class="card">
    <div class="table-top">
        <PageTitle title="Positions" />
    </div>
    <div>
        <div class="add-department">
            <form @submit.prevent="addPosition">
                <MFormTitle formTitle="Add Position" />
                <hr />
                <span class="labelInput">Position Name</span>
                <MFormInput v-model="newPosition.name" inputType="text" placeHolder="" formName="postName" />
                <MFormAddBtn addTitle="Add" />
            </form>
        </div>

        <ul>
            <li v-for="position in positions" :key="position.id">
                {{ position.name }}
                <button @click="editPosition(position.id)">Edit</button>
                <button @click="deletePosition(position.id)">Delete</button>
            </li>
        </ul>
    </div>
</div>
</template>

    
<script>
import MFormTitle from '@/components/MenuFormComponents/MFormTitle.vue'
import MFormInput from '@/components/MenuFormComponents/MFormInput.vue'
import MFormAddBtn from '@/components/MenuFormComponents/MFormAddBtn.vue'

import PolicyInfo from '@/components/PolicyInfo.vue';
import PageTitle from '@/components/PageTitle.vue';
import {
    ref,
    onMounted
} from 'vue';
import axios from 'axios';

const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json'
    }
});

export default {
    name: 'AdminPosition',
    components: {
        PageTitle,
        PolicyInfo,
        MFormTitle,
        MFormInput,
        MFormAddBtn,
    },
    setup() {
        const newPosition = ref({
            name: ''
        });
        const positions = ref([]);

        const fetchPosition = async () => {
            try {
                const response = await api.get('/position');
                positions.value = response.data;
            } catch (error) {
                console.error('Error fetching position:', error.response ?.data || error.message);
            }
        };

        const addPosition = async () => {
            try {
                const response = await api.post('/position-store', {
                    name: newPosition.value.name
                });
                if (response.data) {
                    positions.value.push(response.data);
                    newPosition.value = {
                        name: ''
                    };
                } else {
                    console.error('Error: No data returned from API');
                }
            } catch (error) {
                console.error('Error adding position:', error.response ?.data || error.message);
            }
        };

        const editPosition = async (id) => {
            // Implement edit functionality
            console.log('Edit position:', id);
        };

        const deletePosition = async (id) => {
            try {
                await api.delete(`/position/${id}`);
                positions.value = positions.value.filter(position => position.id !== id);
            } catch (error) {
                console.error('Error deleting position:', error.response ?.data || error.message);
            }
        };

        onMounted(fetchPosition);

        return {
            newPosition,
            positions,
            addPosition,
            editPosition,
            deletePosition
        };
    }
};
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
