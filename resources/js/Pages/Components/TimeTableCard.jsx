import React, { useState } from 'react';

export default function TimeTableCard() {
    // Get the current month and year
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth();
    const currentYear = currentDate.getFullYear();

    // Function to calculate the number of days in the current month
    const getDaysInMonth = (month, year) => {
        return new Date(year, month + 1, 0).getDate();
    };

    // Generate an array of dates for the current month
    const daysInMonth = getDaysInMonth(currentMonth, currentYear);
    const initialDays = Array.from({ length: daysInMonth }, (_, i) => ({ [i + 1]: false }));

    const [days, setDays] = useState(initialDays); // Initialize days state
    const [selected, setSelected] = useState(null); // Initialize selected state

    const updateClick = (day) => {
        const updatedDays = days.map(dayObj => {
            const key = Object.keys(dayObj)[0];
            if (key == day) {
                return { [key]: true };
            }
            return dayObj;
        });
        setDays(updatedDays);
        setSelected(day);
    };

    return (
        <>
            <div className="card mb-4">
                <div className="card-body">
                    <h5 className="card-title">My Time Table</h5>
                    <div className="row col-12 justify-content-center d-flex">
                        {days.map((dayObj, index) => {
                            const day = Object.keys(dayObj)[0];
                            return (
                                <div
                                    className={`m-2 card col-2 text-center ${selected === day ? 'bg-info' : ''}`}
                                    style={{ 
                                        width: "50px",
                                        height: "50px",
                                        display: "flex",
                                        justifyContent: "center",
                                        alignItems: "center",
                                    }}
                                    key={index}
                                    onClick={() => updateClick(day)}
                                >
                                    {day}
                                </div>
                            );
                        })}
                    </div>
                </div>
            </div>
        </>
    );
}