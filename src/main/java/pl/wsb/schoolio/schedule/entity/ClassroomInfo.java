package pl.wsb.schoolio.schedule.entity;

import jakarta.persistence.Column;
import jakarta.persistence.Embeddable;

@Embeddable
public class ClassroomInfo {

    @Column(name = "building", length = 40)
    private String building;

    @Column(name = "room_number", length = 20)
    private String roomNumber;

    protected ClassroomInfo() {
    }

    public ClassroomInfo(String building, String roomNumber) {
        this.building = building;
        this.roomNumber = roomNumber;
    }

    public String getBuilding() { return building; }
    public String getRoomNumber() { return roomNumber; }
}