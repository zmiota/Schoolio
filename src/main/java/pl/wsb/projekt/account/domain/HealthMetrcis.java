package pl.wsb.projekt.account.domain;

import jakarta.persistence.*;
import java.time.LocalDate;

@Entity
@Table(name = "health_metrcis")
public class HealthMetrcis {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private Double weight;
    private Double height;
    private Integer heartRate;
    private LocalDate measurementDate;

    @ManyToOne
    @JoinColumn(name = "user_account_id", nullable = false)
    private UserAccount userAccount;

    public HealthMetrcis() {}

    public HealthMetrcis(Double weight, Double height, Integer heartRate, LocalDate measurementDate, UserAccount userAccount) {
        this.weight = weight;
        this.height = height;
        this.heartRate = heartRate;
        this.measurementDate = measurementDate;
        this.userAccount = userAccount;
    }

    // Gettery i Settery
    public Long getId() { return id; }
    public void setId(Long id) { this.id = id; }

    public Double getWeight() { return weight; }
    public void setWeight(Double weight) { this.weight = weight; }

    public Double getHeight() { return height; }
    public void setHeight(Double height) { this.height = height; }

    public Integer getHeartRate() { return heartRate; }
    public void setHeartRate(Integer heartRate) { this.heartRate = heartRate; }

    public LocalDate getMeasurementDate() { return measurementDate; }
    public void setMeasurementDate(LocalDate measurementDate) { this.measurementDate = measurementDate; }

    public UserAccount getUserAccount() { return userAccount; }
    public void setUserAccount(UserAccount userAccount) { this.userAccount = userAccount; }
}