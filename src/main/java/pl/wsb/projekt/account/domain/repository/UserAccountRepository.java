package pl.wsb.projekt.account.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import pl.wsb.projekt.account.domain.UserAccount;

@Repository
public interface UserAccountRepository extends JpaRepository<UserAccount, Long> {
}