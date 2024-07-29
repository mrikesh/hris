
<template>
    <div>
        <div class="btn-wrapper">
            <button class="btn-container" @click="openModal" @mouseover="showTooltip" @mouseleave="hideTooltip">
                <i class="material-icons">add</i>
            </button>
            <div v-if="isTooltipVisible" class="tooltip">
                Add
            </div>
        </div>
    
        <!-- Modal Overlay -->
        <div v-if="isModalVisible" class="modal-overlay" @click="closeModal">
            <!-- Modal Content -->
            <div class="modal-content" @click.stop>
                <h2>Employee Details</h2>
    
                <form @submit.prevent="submitForm">
                    <!-- Personal Information Section -->
                    <fieldset>
                        <legend>Personal Information</legend>
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" v-model="formData.name" required />
    
                        <label>Gender:</label>
                        <div class="radio-group">
                            <label>
                                <input type="radio" value="Male" v-model="formData.gender" />
                                Male
                            </label>
                            <label>
                                <input type="radio" value="Female" v-model="formData.gender" />
                                Female
                            </label>
                            <label>
                                <input type="radio" value="Other" v-model="formData.gender" />
                                Other
                            </label>
                        </div>
    
                        <label for="address">Address:</label>
                        <textarea id="address" v-model="formData.address" required></textarea>
    
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" v-model="formData.phone" required />
    
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" v-model="formData.dob" required />
    
                        <label for="email">Email:</label>
                        <input type="email" id="email" v-model="formData.email" required />
                    </fieldset>
    
                    <hr />
    
                    <!-- Official Information Section -->
                    <fieldset>
                        <legend>Official Information</legend>
    
                        <label for="department">Department:</label>
                        <select id="department" v-model="formData.department" required>
                            <option value="" disabled>Select Department</option>
                            <option v-for="dept in departments" :key="dept" :value="dept">{{ dept }}</option>
                        </select>
    
                        <label for="position">Position:</label>
                        <select id="position" v-model="formData.position" required>
                            <option value="" disabled>Select Position</option>
                            <option v-for="pos in positions" :key="pos" :value="pos">{{ pos }}</option>
                        </select>
                    </fieldset>
    
                    <!-- Buttons -->
                    <div class="button-group">
                        <button type="submit" class="submit-btn">Submit</button>
                        <button type="button" class="cancel-btn" @click="closeModal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </template>
    
    <script>
    import axios from 'axios';
    
    export default {
        name: "AddBtn",
        data() {
            return {
                isTooltipVisible: false,
                isModalVisible: false,
                formData: {
                    name: '',
                    gender: '',
                    address: '',
                    phone: '',
                    dob: '',
                    email: '',
                    department: '',
                    position: ''
                },
                departments: ['HR', 'Engineering', 'Sales', 'Marketing'], // Example departments
                positions: ['Manager', 'Developer', 'Analyst', 'Designer'] // Example positions
            };
        },
        methods: {
            showTooltip() {
                this.isTooltipVisible = true;
            },
            hideTooltip() {
                this.isTooltipVisible = false;
            },
            openModal() {
                this.isModalVisible = true;
            },
            closeModal() {
                this.isModalVisible = false;
            },
            async submitForm() {
                try {
                    // Send the form data to your API endpoint
                    const response = await axios.post('http://127.0.0.1:8000/api/employee', this.formData);
                    console.log('Employee added:', response.data);
                    // Close the modal after submission
                    this.closeModal();
                    // Reset the form data
                    this.resetFormData();
                } catch (error) {
                    console.error('Error adding employee:', error.response?.data || error.message);
                }
            },
            resetFormData() {
                this.formData = {
                    name: '',
                    gender: '',
                    address: '',
                    phone: '',
                    dob: '',
                    email: '',
                    department: '',
                    position: ''
                };
            }
        }
    };
    </script>
    
    <style scoped>
    /* Your existing styles remain unchanged */
    </style>
    

<style scoped>
.btn-wrapper {
    position: relative;
    display: inline-block;
}

.btn-container {
    margin: 0 0 0 8px;
    width: 42px;
    height: 42px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    border: none;
    background-color: #2374e1;
    color: #ffffff;
    font-size: 24px;
    cursor: pointer;
}

.btn-container:hover {
    background-color: #3d84e3;
}

.tooltip {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    margin-top: 8px;
    padding: 4px 8px;
    background-color: #757575;
    color: #ffffff;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    opacity: 0;
    animation: fadeIn 0.3s forwards;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-content {
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 600px;
    max-width: 90%;
    max-height: 80vh;
    overflow-y: auto;
}

.modal-content h2 {
    margin-top: 0;
    font-size: 24px;
    color: #333;
}

fieldset {
    border: none;
    margin-bottom: 16px;
    padding: 0;
}

legend {
    font-weight: 500;
    margin: 12px 0;
    font-size: 18px;
    color: #555;
}

label {
    display: block;
    margin: 8px 0 4px;
    font-size: 14px;
    color: #333;
}

input[type="text"],
input[type="tel"],
input[type="date"],
input[type="email"],
input[type="password"],
textarea,
select {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 14px;
    color: #333;
    box-sizing: border-box;
}

textarea {
    height: 80px;
}

.radio-group {
    display: flex;
    gap: 12px;
    margin-bottom: 8px;
}

.radio-group label {
    display: flex;
    align-items: center;
    font-size: 14px;
}

button {
    margin-top: 8px;
    padding: 10px 15px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    font-size: 14px;
    color: #fff;
}

.submit-btn {
    background-color: #2374e1;
    margin-right: 10px;
}

.submit-btn:hover {
    background-color: #256fce;
}

.cancel-btn {
    background-color: #ccc;
}

.cancel-btn:hover {
    background-color: #999;
}
</style>
