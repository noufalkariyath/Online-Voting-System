         .reward-container {
      background-color: #fff;
      color: #000;
      border-radius: 10px;
      width: 500px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: left;
    }
    
/* List Styling */
.reward-container ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    width: 100%;
    border-collapse: collapse;
}

/* List Item Styling */
.reward-container li {
    font-size: 16px;
    color: #555;
    padding: 10px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between; /* Aligns name and dates properly */
    text-align: left;
}

/* Header List Item */
.reward-container li.header {
    font-weight: bold;
    background: #f5f5f5;
}

/* Last item without a border */
.reward-container li:last-child {
    border-bottom: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 90%;
        margin: 10px auto;
    }

    .reward-container li {
        flex-direction: column;
        text-align: center;
    }
}
