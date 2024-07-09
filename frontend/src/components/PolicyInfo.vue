<template>
    <div>
        <div class="policy-list" @click="togglePolicy">
            <div class="policy-list-title">
                {{ policyTitle }}
            </div>
            <div class="policy-dropdown-icon">
                <i class="material-icons">{{ isExpanded ? 'keyboard_arrow_up' : 'keyboard_arrow_down' }}</i>
            </div>
        </div>
        <div v-if="isExpanded" class="policy-details">
            <p>Attachment</p>
            <div class="attachment">
                <a href="path/to/attachment.pdf" target="_blank" class="attachment-link"><i class="material-icons">picture_as_pdf</i></a>
            </div>
        </div>
    </div>
    </template>
    
    <script>
    export default {
        name: "PolicyInfo",
        data() {
            return {
                isExpanded: false
            }
        },
        props:{
            policyTitle:{
                type: String,
            }
        },
        methods: {
            togglePolicy() {
                this.isExpanded = !this.isExpanded;
            }
        }
    }
    </script>
    
    <style>
    .policy-list {
        margin: 10px;
        padding: 8px 16px;
        width: 100%;
        border: .25px solid #c7c1c180;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }
    
    .policy-list:hover {
        background-color: #f1f1f1;
    }
    
    .policy-details {
        width: 100%;
        margin: 10px;
        padding: 8px 16px;
        border-left: 4px solid #c7c1c180;
        background-color: #f9f9f9;
        border-radius: 4px;
    }
    
    .attachment {
        width: 56px;
        height: 36px;
        border: .25px solid #c7c1c180;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .attachment-link {
        color: #F44336;
        text-decoration: none;
        font-weight: 500;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .attachment-link:hover {
        text-decoration: underline;
    }
    </style>
    